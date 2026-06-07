<div class="card shadow-sm border-0 text-center p-3 rounded-4">
    <div class="text-muted small mb-1 d-flex justify-content-between align-items-center">
        <span>
            <i class="bi {{ $icon }} text-{{ $iconColor }} me-1"></i> {{ $label }}
        </span>
        @if ($badge)
            <span class="badge {{ $badge['class'] }} small">{{ $badge['text'] }}</span>
        @endif
    </div>
    <h3 class="fw-bold text-{{ $valueColor }}">{{ $value }}</h3>
</div>



<!-- je de vrai utilisé tous ça dans

<div class="row">
    <div class="col-md-3 col-sm-6 mb-4">
        <x-stat-card
            label="Utilisateurs"
            icon="bi-people-fill"
            icon-color="primary"
            value="1,245"
            value-color="primary"
            :badge="['text' => '+12%', 'class' => 'bg-success-subtle text-success']"
        />
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
        <x-stat-card
            label="Commandes"
            icon="bi-bag-check-fill"
            icon-color="success"
            value="320"
            value-color="success"
            :badge="['text' => '-3%', 'class' => 'bg-danger-subtle text-danger']"
        />
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
        <x-stat-card
            label="Revenus"
            icon="bi-currency-dollar"
            icon-color="warning"
            value="$12,540"
            value-color="warning"
            :badge="['text' => '+8%', 'class' => 'bg-success-subtle text-success']"
        />
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
        <x-stat-card
            label="Tickets"
            icon="bi-life-preserver"
            icon-color="danger"
            value="27"
            value-color="danger"
            :badge="['text' => 'En attente', 'class' => 'bg-secondary-subtle text-muted']"
        />
    </div>
</div>


 -->