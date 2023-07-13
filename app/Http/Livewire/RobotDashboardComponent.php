<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class RobotDashboardComponent extends ModalComponent
{
    //     public $robots;
//     public $editRobotId;
//     public $robotName;
//     public $editModalOpen = false;


    //     public function mount()
//     {
//         // Retrieve the robot data and initialize variables
//         $this->robots = []; // Replace with your logic to retrieve robot data
//         $this->editRobotId = null;
//         $this->robotName = null;
//     }

    //     public function openEditModal($robotId)
//     {
//         $this->editRobotId = $robotId;
//         $this->editModalOpen = true;
//         $this->resetErrorBag();
//         $this->resetValidation();

    //         // Retrieve the robot name based on the robot ID
//         // You can replace this with your own logic to fetch the robot name
//         $this->robotName = ''; // Replace with your logic to retrieve robot name

    //         $this->dispatchBrowserEvent('open-edit-modal');
//     }

    //     public function saveChanges()
//     {
//         // Validate the form fields
//         $this->validate([
//             'robotName' => 'required',
//         ]);

    //         // Handle the save changes logic
//         // ...

    //         // Close the modal
//         $this->closeEditModal();
//     }

    //     public function closeEditModal()
//     {
//         $this->editRobotId = null;
//         $this->robotName = null;
//         $this->editModalOpen = false;

    //         $this->dispatchBrowserEvent('close-edit-modal');
//     }

    public function render()
    {
        return view('livewire.robot-dashboard-component');
    }







}