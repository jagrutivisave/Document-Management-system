<?php

namespace App\Http\Livewire\User;

use App\Models\Document as ModelsDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Document extends Component
{
    public $title,
        $document,
        $edit_id,
        $date,
        $remark,
        $edit_remark,
        $department,
        $edit_department,
        $edit_title,
        $edit_date,
        $new_document,
        $old_document,
        $showTable = true,
        $createForm = false,
        $updateForm = false;
    public $totalDocuments;
    use WithFileUploads;

    use WithPagination;
    public function pageinationView()
    {
        return 'custom-pagination-links-view';
    }
    public function render()
    {
        $documents = ModelsDocument::orderBy('id')->where('user_id', Auth::user()->id)->paginate(4);
        $this->totalDocuments = ModelsDocument::count();
        return view('livewire.user.document', compact('documents'))->layout('layouts.user-app');
    }
   

    public function showForm()
    {
        $this->showTable = false;
        $this->createForm = true;
    }

    public function create()
    {
        $document = new ModelsDocument();
        $this->validate([
            'title' => ['required'],
            'date' =>['required'],
            'department'=>['required'],
            'document' => ['required'],
            'remark'=>['required'],
        ]);
        $filename = "";
        if ($this->document) {
            $filename = $this->document->store('documents', 'public');
        }
        $document->title = $this->title;
        $document->user_id = Auth::user()->id;
        $document->date = $this->date;
        $document->department=$this->department;
        $document->document = $filename;
        $result = $document->save();
        $document->remark = $this->remark;
        if ($result) {
            session()->flash('success', 'Document created Successfully');
            $this->title = "";
            $this->date = "";
            $this->department="";
            $this->document = "";
            $this->remark="";
           
        }
    }

    public function edit($id)
    {
        $this->showTable = false;
        $this->updateForm = true;
        $documents = ModelsDocument::findOrFail($id);
        $this->edit_id = $documents->id;
        $this->edit_date = $documents->date;
        $this->edit_title = $documents->title;
        $this->edit_department = $documents->department;
        $this->old_document = $documents->document;
        $this->edit_remark = $documents->remark;
    }

    public function update($id)
    {
        $documents = ModelsDocument::findOrFail($id);
        $this->validate([
            'edit_title' => ['required'],
            'edit_date' => ['required'],
            'edit_department' => ['required'],
            'edit_remark' => ['required'],
        ]);
        $filename = "";
        if ($this->new_document)
        {
            $path = public_path('storage\\') . $documents->document;
            if (File::exists($path)) {
                File::delete($path);
            }
            $filename = $this->new_document->store('documents', 'public');
        }
        else 
        {
            $filename = $this->old_document;
        }
        $documents->title = $this->edit_title;
        $documents->date = $this->edit_date;
        $documents->department = $this->edit_department;
        $documents->document = $filename;
        $result = $documents->save();
        $documents->remark = $this->edit_remark;
        if ($result) 
        {
            session()->flash('success', 'Document Updated Successfully');
            $this->edit_title = "";
            $this->edit_date = "";
            $this->edit_department = "";
            $this->new_document = "";
            $this->old_document = "";
            $this->edit_remark = "";
            
        }
    }

    public function delete($id)
    {
        $documents = ModelsDocument::findOrFail($id);
        $path = public_path('storage\\') . $documents->document;
        if (File::exists($path)) {
            File::delete($path);
        }
        $result = $documents->delete();
        if ($result) {
            session()->flash('success', 'Document Delete Successfully');
        }
    }
}
