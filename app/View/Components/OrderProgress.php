<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderProgress extends Component
{
    public $milestones;
    public $progressPercentage;

    /**
     * Create a new component instance.
     */
    public function __construct(public $order)
    {
        $this->milestones = [
            'PQ' => [
                'status' => !is_null($order->pq_no),
                'label' => 'Price Quotation',
                'date' => $order->pq_date,
                'value' => $order->pq_no
            ],
            'PI' => [
                'status' => !is_null($order->pi_no),
                'label' => 'Proforma Invoice',
                'date' => $order->pi_date,
                'value' => $order->pi_no
            ],
            'AP' => [
                'status' => !is_null($order->ap_value),
                'label' => 'Approval',
                'date' => $order->ap_date,
                'value' => number_format($order->ap_value, 2)
            ],
            'CI' => [
                'status' => !is_null($order->ci_no),
                'label' => 'Commercial Invoice',
                'date' => $order->ci_date,
                'value' => $order->ci_no
            ],
            'BP' => [
                'status' => !is_null($order->bp_value),
                'label' => 'Bank Payment',
                'date' => $order->bp_date,
                'value' => number_format($order->bp_value, 2)
            ],
            'BL' => [
                'status' => !is_null($order->bl_no),
                'label' => 'Bill of Lading',
                'date' => $order->bl_date,
                'value' => $order->bl_no
            ],
        ];

        $this->progressPercentage = $this->calculateProgress();
    }

    private function calculateProgress(): int
    {
        $completedSteps = count(array_filter($this->milestones, fn($step) => $step['status']));
        return round(($completedSteps / count($this->milestones)) * 100);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.order-progress');
    }
}
