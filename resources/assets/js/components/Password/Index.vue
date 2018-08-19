<template>
    <div class="container">
        <h2>Password Generator</h2>
        <form>
            <h3>パスワードに含む文字の種類</h3>
            <md-checkbox v-model="option.upper" class="md-primary" @change="ValidationCheck">大文字</md-checkbox>
            <md-checkbox v-model="option.lower" class="md-primary" @change="ValidationCheck">小文字</md-checkbox>
            <md-checkbox v-model="option.number" class="md-primary" @change="ValidationCheck">数字</md-checkbox>
            <md-checkbox v-model="option.symbol" class="md-primary" @change="ValidationCheck">記号</md-checkbox>
            <div v-if="!validation.check" class="validation">文字の種類は必ず1つ選択してください。</div>
            <div class="length">
                <md-field>
                    <label>文字数</label>
                    <md-input v-model="option.length" @change="ValidationLength" @:keyup="ValidationLength" min="4" max="100" type="number"></md-input>
                </md-field>
            </div>
            <div v-if="!validation.length" class="validation">4〜100までの字数を入力してください。。</div>
            <div class="number">
                <md-field>
                    <label>個数</label>
                    <md-input v-model="option.createNumber" @change="ValidationNumber" @:keyup="ValidationNumber" min="1" max="100" type="number"></md-input>
                </md-field>
            </div>
            <div v-if="!validation.number" class="validation">1〜100以内個で入力してください。</div>
        </form>
        <md-button class="md-raised md-primary" v-on:click="onSubmit" type="submit" v-bind:disabled="disabled">Create</md-button>
        <div v-show='show' class="result">
            <h3>生成されたパスワード</h3>
            <ul class="list">
                <li v-for="item in list"
                    v-clipboard:copy="item"
                    v-clipboard:success="onCopy"
                    v-clipboard:error="onError">
                    {{ item }}
                    <span class="copy">
                    click copy!
                </span>
                </li>
            </ul>
        </div>
        <md-snackbar :md-active.sync="showSnackbar" md-persistent>
            <span>クリップボードにコピーしました</span>
            <md-button class="md-primary" @click="showSnackbar = false">
                <i class="material-icons">close</i></md-button>
        </md-snackbar>
    </div>
</template>

<script>
    export default {
        name: 'Password',
        data: () => ({
            list: '',
            show: false,
            validation: {
                check: true,
                length: true,
                number: true
            },
            option: {
                upper: true,
                lower: true,
                number: true,
                symbol: false,
                length: 8,
                createNumber: 1
            },
            disabled: false,
            showSnackbar: false
        }),
        methods: {
            ValidationLength: function (e) {
                if (this.option.length > 100 || this.option.length < 4) {
                    this.validation.length = false;
                } else {
                    this.validation.length = true;
                }
            },
            ValidationNumber: function (e) {
                if (this.option.createNumber > 100 || this.option.createNumber < 1) {
                    this.validation.number = false;
                } else {
                    this.validation.number = true;
                }
            },
            ValidationCheck: function (e) {
                if(this.option.upper == false && this.option.lower == false && this.option.number == false && this.option.symbol == false ) {
                    this.validation.check = false;
                } else {
                    this.validation.check = true;
                }
            },
            onSubmit: function () {
                this.show = false
                axios.post('/api/password/',this.option)
                    .then(res => {
                        this.list = res.data
                        this.show = true
                    })
            },
            onCopy: function () {
                this.showSnackbar = true
            },
            onError: function (e) {
                alert('Failed to copy texts')
            }
        },
        watch: {
            'option.length': function (newLength, oldLength) {
                if (newLength > 100 || newLength < 4) {
                    this.validation.length = false;
                } else {
                    this.validation.length = true;
                }
            },
            'option.createNumber': function (newNumber, oldLength) {
                if (newNumber > 100 || newNumber < 1) {
                    this.validation.number = false;
                } else {
                    this.validation.number = true;
                }
            },
            option: {
                handler: function () {
                    let disabled = false;
                    for (var key in this.validation) {
                        if (!this.validation[key]) {
                            disabled = true;
                        }
                    }
                    this.disabled = disabled;
                },
                deep: true
            }
        }
    }
</script>

<style scoped lang="scss">
    h2 {
        font-size: 24px;
        margin-bottom: 16px;
        padding: 16px 0;
    }
    h3 {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 8px;
    }
    .validation {
        color: #ff0000;
    }
    .length,
    .number {
        max-width: 350px;
    }
    .result {
        margin-top: 24px;
        animation: fadeIn .5s ease 0s 1 normal;
    }
    .list {
        margin: 0;
        padding: 4px 0;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: flex-start;
        background-color: #f0f0f0;
        flex-wrap: wrap;
        li {
            position: relative;
            display: inline-block;
            margin: 4px;
            padding: 8px 40px;
            background-color: #cfcfcf;
            overflow: hidden;
            text-align: center;
            flex-wrap: wrap;
            min-width: 140px;
            &:hover {
                cursor: pointer;
                opacity: .8;
                .copy {
                    top: 0;
                    transition: 0.2s;
                }
            }
            .copy {
                position: absolute;
                top: -20px;
                right: 0;
                font-size: 10px;
                font-weight: bold;
                background-color: #000;
                color: #fff;
                padding: 0 8px;
                transition: 0.2s;
                opacity: .4;
            }
        }
    }

    @keyframes fadeIn {
        0% {opacity: 0}
        100% {opacity: 1}
    }
</style>
