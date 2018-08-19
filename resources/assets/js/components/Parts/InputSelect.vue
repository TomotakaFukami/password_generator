<template>
    <div>
        <md-field>
            <label for="movie">{{ label }}</label>
            <md-select :name="name"
                       :value="value"
                       @input="updateValue"
                       @focus="$emit('focus', $event)"
                       @blur="$emit('blur', $event)">
                <slot :options="options"></slot>
            </md-select>
        </md-field>
    </div>
</template>

<script>
    export default {
        props: {
            value: {},
            label: { type: String },
            name: { type: String, require: true },
            options: { type: Array, required: true }
        },

        methods: {
            updateValue (e) {
                let value = e.target.selectedOptions.length ? e.target.selectedOptions[0]._value : null
                this.$emit('input', value)
                this.$emit('selected', value)
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
