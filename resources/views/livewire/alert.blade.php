<div x-data="{ visible = @entangle('visible')} " x-cloak>
    <div x-show="visible">
        <x-alert :status="$status" :message="$message" />
    </div>
</div>
