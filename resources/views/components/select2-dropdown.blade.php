<div>
    <label for="{{ $name }}" class="col-form-label font-13">{{ $label }}</label>

    <select name="{{ $name }}" id="{{ $name }}"
        class="form-control form-control-sm rounded-0 select2-component" data-url="{{ $url }}"
        data-updates="{{ $updates }}" data-selected="{{ $selected }}" data-placeholder="{{ $placeholder }}"
        data-aux-id="{{ $auxIdSelector }}">
        <option value="">{{ $placeholder }}</option>
    </select>
    <div class="aguarde" style="display: none;">Aguarde ...</div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
    initializeSelect2($('.select2-component'));
});

function initializeSelect2($selects) {
    $selects.each(function() {
        const $select = $(this);
        setupSelect2($select);
        handlePreselectedOption($select);
        handleSelectChange($select);
    });
}

function setupSelect2($select) {
    const apiUrl = $select.data('url');
    const placeholder = $select.data('placeholder') || 'Selecione uma opção';
    const auxIdSelector = $select.data('aux-id');

    $select.select2({
        placeholder: placeholder,
        allowClear: true,
        ajax: {
            url: apiUrl,
            dataType: 'json',
            delay: 500,
            data: function(params) {
                const auxId = $(auxIdSelector).val();
                return {
                    search: params.term,
                    page: params.page || 1,
                    auxId: auxId
                };
            },
            processResults: function(data) {
                return {
                    results: data.items
                };
            },
            cache: true
        }
    });
}

function handlePreselectedOption($select) {
    if ($select.data('selected')) {
        const apiUrl = $select.data('url');
        $.ajax({
            type: 'GET',
            url: apiUrl + '/' + $select.data('selected')
        }).then(function(data) {
            const option = new Option(data.items[0].text, data.items[0].id, true, true);
            $select.append(option).trigger('change');
            $select.trigger({
                type: 'select2:select',
                params: {
                    data: data.items[0]
                }
            });
        });
    }
}

function handleSelectChange($select) {
    const updates = $select.data('updates');
    $select.off('select2:select').on('select2:select', function(e) {
        if (updates) {
            const $updatesSelect = $('#' + updates);
            $updatesSelect.empty().trigger('change');
            $updatesSelect.select2('destroy');
            initializeSelect2($updatesSelect);
        }
    });
}

    </script>
@endpush
