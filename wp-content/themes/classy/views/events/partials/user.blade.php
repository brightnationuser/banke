

<div class="user">
    <div class="user__about">
        @if ($avatar)
            <div class="about__photo"
                style="background-image: url('{{ $avatar }}')">
            </div>
        @endif
        <div class="about__info">
            <div class="info__name">{{ $name }}</div>
            <div class="info__role tooltip tooltip-role" title="{{ $role_length > 55 ? $role : '' }}">
                @if ($role_length > 55)
                    {{ \Helpers\General::getTruncatedString($role, 55, '...') }}
                @else
                    {{ $role }}
                @endif
            </div>
        </div>
    </div>
    <div class="user__description tooltip tooltip-desc" title="{{ $desc_length > 220 ? $desc : '' }}">
        @if ($desc_length > 220)
            {{ \Helpers\General::getTruncatedString($desc, 220, '...') }}
        @else
            {{ $desc }}
        @endif
    </div>
</div>