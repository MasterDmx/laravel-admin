<li @if ($isActive) class="active open" @endif>
    <a href="#" title="{{ $title ?? '' }}" data-filter-tags="{{ $filterTags ?? 'test' }}" aria-expanded="false">

        @if ($group->hasIconClass())
            <i class="{{ $group->getIconClass() }}"></i>
        @endif

        <span class="nav-link-text">{{ $group->getName() }}</span>
    </a>
    <ul>
        {!! $content ?? '' !!}
    </ul>
</li>
