<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Rap2hpoutre\FastExcel\FastExcel;

class UserIndex extends Component
{
    use WithPagination;

    public $name;
    public $email;
    public $password;
    public User $user;
    public $deleteId;
    public $updateId;

    public function mount(User $user) {
        $this->user = $user;
    }

    public function render()
    {
        $users = User::orderBy('id', 'desc')->paginate(5);
        return view('livewire.user.user-index', [
            'users' => $users
        ]);
    }

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required',
        ];
    }

    //custom validation message
    protected $messages = [
        'name.required' => 'ชื่อสกุลห้ามว่าง',
        'email.required' => 'อีเมล์ห้ามว่าง',
        'email.email' => 'รูปแบบอีเมล์ไม่ถูกต้อง',
        'email.unique' => 'มีผู้ใช้งานอีเมล์นี้แล้ว กรุณาลองใหม่',
        'password.required' => 'รหัสผ่านห้ามว่าง',
    ];

    //Realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store() {

        $this->validate();

        try {
            $this->user::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            $this->resetForm();

            session()->flash('message', 'เพิ่มข้อมูลสำเร็จ');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('message', 'เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
        }
    }

    public function resetForm() {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function exportExcel() {
        $users = User::all();
        // (new FastExcel($users))->export( uniqid().'.xlsx');

        return response()->streamDownload(function() use($users) {
            return (new FastExcel($users))->export('php://output', function($user) {
                return [
                    'Email' => $user->email,
                    'Created At' => $user->created_at->format('Y-m-d H:i:s')
                ];
            });
        },
           sprintf('user-%s-%s.xlsx', date('Y-m-d'), uniqid() )
        );
    }

    public function importExcel() {
        try {
            (new FastExcel)->import('users-import.xlsx', function ($line) {
                return User::create([
                    'name' => $line['name'],
                    'email' => $line['email'],
                    'password' => Hash::make($line['password'])
                ]);
            });
            session()->flash('message', 'นำเข้าข้อมูลผู้ใช้สำเร็จ');
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('message', 'เกิดข้อผิดพลาดในการ import');
        }
    }

    public function confirmDelete($id) {
        $this->deleteId = $id;
    }

    public function delete() {
        User::find($this->deleteId)->delete();
        session()->flash('message', 'ลบข้อมูลสำเร็จ');
    }

    public function confirmEdit($id) { //open edit form
        $this->updateId = $id;
        $this->resetForm();
        $user = User::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function update() {

        User::find($this->updateId)->update([
            'name' => $this->name,
            'email' => $this->email
        ]);
        $this->resetForm();
        session()->flash('message', 'อัปเดตข้อมูลสำเร็จ');
    }

}
