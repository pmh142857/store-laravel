<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $contacts = Contact::paginate(10);

        $viewData = [
            'contacts' => $contacts
        ];
        return view('admin::contact.index',$viewData);
    }

    public function action (Request $request, $action,$id )
    {
        $contact = Contact::find($id);
        switch ($action)
        {
            case 'status':
                $contact->ct_status =  $contact->ct_status == 1 ? 0 : '';
                $contact->save();
                
            break;
            // 
            case 'delete':
                $contact->delete();
                $messages ='Bạn đã xóa một thông tin lên hệ.';
                break;               
        }
        return redirect()->back()->with('success',$messages);
    }
    
      
}
