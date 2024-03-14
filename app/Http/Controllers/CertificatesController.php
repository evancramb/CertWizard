<?php

namespace App\Http\Controllers;
use App\Models\certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;
use Illuminate\Support\Facades\File;
    class CertificatesController extends Controller
    {

        public function index()
        {
            $certificates = Certificate::paginate(50);
            return view('page_view.index', compact('certificates'));
        }

        public function postCertificate(Request $request)
        {
            $validatedData = Validator::make($request->all(), [
                'template' => ['required'],
                'student_id' => ['required'],
                'full_name' => ['required', 'string'],
                'start_date' => ['required'],
                'end_date' => ['required'],
                'course_code' => ['required'],
                'issue_date' => ['required'],
                'picture' => 'required|image|mimes:jpeg,png,jpg',
                'instructor_name' => 'required|',
                'back_text' => ['required'],
            ]);

            if ($validatedData->fails()) {

                return Redirect()->back()->withError($validatedData->errors()->all());
            } 
            $imageName ='';
            if($request->file('picture'))
        {
            $file = $request->file('picture');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/certificates/', $filename);
            $imageName = $filename;
        }
            $certificate = Certificate::create([
                'template' => $request->input('template'),
                'student_id' => $request->input('student_id'),
                'full_name' => $request->input('full_name'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'course_code' => $request->input('course_code'),
                'issue_date' => $request->input('issue_date'),
                'picture' => $imageName,
                'instructor_name' => $request->input('instructor_name'),
                'back_text' => $request->input('back_text'),
            ])->id;
            $data =Certificate::findOrFail($certificate)->toArray();
            $imagePath = public_path('uploads/certificates/' . $data['picture']);
            $base64Image = base64_encode(file_get_contents($imagePath));
            $pdf = PDF::loadView('page_view.pdf_view', compact('data','base64Image'));
            $fileName = 'certificate.pdf';
            $directory = public_path('downloads');
            File::makeDirectory($directory, 0777, true, true);
            $filePath = $directory . '/' . $fileName;
            $pdf->save($filePath);
            chmod($directory . '/' . $fileName, 0777);
            return response()->download($filePath)->deleteFileAfterSend(true);
        }

        public function generatePDF($id)
        {
            $data = Certificate::findOrFail($id)->toArray();
            $imagePath = public_path('uploads/certificates/' . $data['picture']);
            $base64Image = base64_encode(file_get_contents($imagePath));
            $pdf = PDF::loadView('page_view.pdf_view', compact('data', 'base64Image'));
        
            $fileName = 'certificate.pdf';
            $directory = public_path('downloads');
            File::makeDirectory($directory, 0777, true, true);
            $filePath = $directory . '/' . $fileName;
            $pdf->save($filePath);
            chmod($directory . '/' . $fileName, 0777); 
            return response()->download($filePath)->deleteFileAfterSend(true);
        }
    }