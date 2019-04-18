<div class="page-tabs">
    @if($parent_id)
        @foreach (get_field('acf_tabs', $parent_id) as $key => $tab)
            <a class="page-tabs__item {{ get_permalink() == $tab['link'] ? 'm_active' : '' }}"
            href="{{ $tab['link'] }}">
                {{ $tab['title'] }}
            </a>
        @endforeach
    @endif
</div>