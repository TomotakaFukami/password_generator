<template>
    <div class="md-layout-item md-small-size-100">
        <md-field>
            <label for="first-name">{{label}}</label>
            <md-input :type="type"
                      :name="name"
                      :placeholder="placeholder"
                      :value="value"
                      @input="updateValue"
                      @focus="$emit('focus', $event)"
                      @blur="$emit('blur', $event)"
            />
        </md-field>
    </div>
</template>

<script>
    export default {
        name: 'InputText',
        props: {
            value: {},
            label: { type: String },
            name: { type: String, require: true },
            type: { type: String, default: 'text' },
            placeholder: { type: String }
        },

        methods: {
            updateValue (e) {
                this.$emit('input', this.value)
                this.$emit('change', this.value)
            }
        }
    }
</script>
