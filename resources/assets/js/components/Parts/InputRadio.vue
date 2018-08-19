<template>
    <div>
        <md-radio type="radio"
                  :name="name"
                  :value="value"
                  :checked="checked === value"
                  @change="updateValue"
                  @focus="$emit('focus', $event)"
                  @blur="$emit('blur', $event)"
                  class="md-primary"
        >
            {{label}}
        </md-radio>
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

        methods: {
            updateValue (e) {
                this.$emit('input', this.value)
                this.$emit('checked', this.value)
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
