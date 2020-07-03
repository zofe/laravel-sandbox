<?php

namespace App\Http\Controllers\Api\V1;

use App\Contact;
use App\Http\Controllers\Api\V1\Transformer\ContactTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class ContactController extends Controller
{
    /**
     * @var Manager
     */
    private $fractal;


    public function __construct(
        Manager $fractal
    ) {
        $this->fractal = $fractal;
        $this->fractal->setSerializer(new \League\Fractal\Serializer\ArraySerializer());

    }

    /**
     * @OA\GET(
     *      path="/api/v1/contacts",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       )
     * )
     */
    public function index()
    {
        $contacts = Contact::all();
        $contacts = new Collection($contacts, new ContactTransformer());
        $contacts = $this->fractal->createData($contacts);
        return response()->json(['contacts' => $contacts]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required'
        ]);

        $contact = new Contact([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'job_title' => $request->get('job_title'),
            'city' => $request->get('city'),
            'country' => $request->get('country')
        ]);
        $success = $contact->save();
        return response()->json(['success'=>!!$success, 'contact' => $contact]);
    }

    /**
     * @OA\GET(
     *      path="/api/v1/contacts/id",
     *      @OA\Parameter(name="id", in="path", description="contact id" ,required=true, @OA\Schema(type="string",default="1"), style="form"),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       )
     * )
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        $contact = new Item($contact, new ContactTransformer);
        $contact = $this->fractal->createData($contact);
        return response()->json(['contact' => $contact]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required'
        ]);

        $contact = Contact::find($id);
        $contact->first_name =  $request->get('first_name');
        $contact->last_name = $request->get('last_name');
        $contact->email = $request->get('email');
        $contact->job_title = $request->get('job_title');
        $contact->city = $request->get('city');
        $contact->country = $request->get('country');
        $success = $contact->save();

        return response()->json(['success'=>!!$success, 'contact' => $contact]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $success = $contact->delete();

        return response()->json(['success'=>!!$success]);
    }
}
