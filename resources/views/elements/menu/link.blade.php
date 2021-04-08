<li @if ($isActive) class="active" @endif>
    <a href="{{ $link->getUrl() }}" title="{{ $title ?? '' }}" data-filter-tags="{{ $filterTags ?? '' }}">

        @if ($link->hasIconClass())
            <i class="{{ $link->getIconClass() }}"></i>
        @endif

        <span class="nav-link-text">{{ $link->getName() }}</span>
    </a>
</li>

