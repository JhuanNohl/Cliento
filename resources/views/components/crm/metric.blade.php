@props(['label', 'value', 'note', 'icon' => 'stats'])

<div class="metric-card">
    <div class="metric-meta">
        <span>{{ $label }}</span>
        <span class="glyphicon glyphicon-{{ $icon }}" aria-hidden="true"></span>
    </div>
    <div class="metric-value">{{ $value }}</div>
    <p class="metric-note">{{ $note }}</p>
</div>
