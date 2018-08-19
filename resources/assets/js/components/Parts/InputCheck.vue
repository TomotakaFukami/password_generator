<template>
    <div>
        <md-checkbox type="checkbox"
                     :name="name"
                     :value="value"
                     :checked="input === value"
                     @change="updateValue"
                     @focus="$emit('focus', $event)"
                     @blur="$emit('blur', $event)">
            {{ label }}
        </md-checkbox>
    </div>
</template>

<script>
    export default {
        model: {
            prop: 'checked',
            event: 'input'
        },

        props: {
            value: {},
            checked: {},
            label: { type: String },
            name: { type: String, require: true }
        },

        computed: {
            group () {
                return ('$parent' in this && this.$parent.$options.name === 'vue-group') ? this.$parent : null
            },
            input () {
                return this.group ? this.group.value : this.checked
            }
        },

        methods: {
            updateValue (e) {
                let value = e.target.checked ? this.value : null
                if (this.group) {
                    this.group.$emit('input', value)
                    this.group.$emit('checked', value)
                } else {
                    this.$emit('input', value)
                    this.$emit('checked', value)
                }
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
