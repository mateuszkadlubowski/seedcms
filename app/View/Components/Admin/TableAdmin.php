<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class TableAdmin extends Component
{
    public array $columns = [];

    public function __construct(
        public Collection $items,
        public string     $translationKey,
    )
    {
        $firstItem = $items->first();
        $this->columns = array_keys($firstItem->getAttributes());
        if($this->columns[0] === 'id'){
            unset($this->columns[0]);
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.admin.table-admin');
    }
}
