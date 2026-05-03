@props(['icon', 'title', 'text'])

<div class="feature-card">
    <span class="feature-icon glyphicon glyphicon-{{ $icon }}" aria-hidden="true"></span>
    <div>
        <h3>{{ $title }}</h3>
        <p>{{ $text }}</p>
    </div>
</div>
