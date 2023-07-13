<?php
namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use Livewire\Component;

class EditModalComponent extends Component
{

    public $isModalOpen = false;

    protected $listeners = ['openModal'];

    public function render()
    {
        // if ($this->isModalOpen) {

        return view('livewire.edit-modal-component', [
            'isModalOpen' => $this->isModalOpen,
        ]);

    }

    public function openModal()
    {
        $this->isModalOpen = true;
        dd($this->isModalOpen);

    }

    public function hideModal()
    {
        $this->isModalOpen = false;

    }


}