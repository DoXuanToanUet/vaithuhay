<div class="input-group find-replace-in-custom-short-code {{ isset($addon) ? 'addon' : '' }} {{ isset($remove) ? 'remove' : '' }}"
     @if(isset($dataKey)) data-key="{{ $dataKey }}" @endif>
    @if(isset($addon))
        @include('form-items.partials.button-addon-test')
    @endif
    <div class="input-container">
        @include('form-items.input-with-inner-key', [
            'type'          => 'checkbox',
            'innerKey'      => \WPCCrawler\Objects\Settings\Enums\SettingInnerKey::REGEX,
            'titleAttr'     => _wpcc('Regex?'),
            'showTooltip'   => true,
        ])

        @include('form-items.input-with-inner-key', [
            'innerKey'      => \WPCCrawler\Objects\Settings\Enums\SettingInnerKey::SHORT_CODE,
            'placeholder'   => _wpcc('Short code'),
            'classAttr'     => 'short-code',
        ])

        @include('form-items.input-with-inner-key', [
            'innerKey'      => \WPCCrawler\Objects\Settings\Enums\SettingInnerKey::FIND,
            'placeholder'   => _wpcc('Find'),
        ])

        @include('form-items.input-with-inner-key', [
            'innerKey'      => \WPCCrawler\Objects\Settings\Enums\SettingInnerKey::REPLACE,
            'placeholder'   => _wpcc('Replace'),
        ])
    </div>
    @if(isset($remove))
        @include('form-items/remove-button')
    @endif
</div>