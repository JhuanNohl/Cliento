@props(['title', 'meta'])

<div class="item-row">
    <div>
        <h3>{{ $title }}</h3>
        <p class="item-meta">{{ $meta }}</p>
    </div>
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
</div>
