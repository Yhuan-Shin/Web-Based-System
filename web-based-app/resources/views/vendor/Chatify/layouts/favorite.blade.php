<div class="favorite-list-item">
    @if($user)
        <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
            style="background-image: url('{{ Chatify::getUserWithAvatar($user)->avatar }}');">
        </div>
        <p>
            @if(auth('user')->check())
            {{ strlen($user->name) > 5 ? substr($user->name,0,6).'..' : $user->name }}
            {{ strlen($user->first_name) > 5 ? substr($user->first_name,0,6).'..' : $user->first_name }}
            {{ strlen($user->last_name) > 5 ? substr($user->last_name,0,6).'..' : $user->last_name }}
            @elseif(auth('admin')->check())
            {{ strlen($user->first_name) > 5 ? substr($user->first_name,0,6).'..' : $user->first_name }}
            {{ strlen($user->last_name) > 5 ? substr($user->last_name,0,6).'..' : $user->last_name }}
            @endif
        </p>
    @endif
</div>
