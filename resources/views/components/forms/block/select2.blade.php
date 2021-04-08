<x-admin-form-block :title="$title" :for="$id" :size="$size" align-center="false">
    <x-admin-form-field-select2
        :id="$id"
        :name="$name"
        :options="$options"
        :options-driver="$optionsDriver"
        :selected="$selected"
        :option-key-value="$optionKeyValue"
        :option-key-name="$optionKeyName"
        :placeholder="$placeholder"
        :multiple="$multiple"
        :search="$search"
        :default-option="$defaultOption"
    >{{ $slot }}</x-admin-form-field-select2>
</x-admin-form-block>
