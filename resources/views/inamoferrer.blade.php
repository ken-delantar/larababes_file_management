<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Upload</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans p-6">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-xl p-6">
        <h1 class="text-2xl font-bold mb-4">Upload a PDF</h1>

        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <input 
                type="file" 
                name="file" 
                accept="application/pdf, image/jpeg, image/jpg, image/png" 
                required
                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                       file:rounded-full file:border-0 file:text-sm file:font-semibold
                       file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
            >
            <button 
                type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
            >
                Submit
            </button>
        </form>

        <img src="https://cdn-icons-png.flaticon.com/512/833/833281.png" 
     alt="No documents uploaded" 
     class="mx-auto w-32 h-32 opacity-50 mb-4" />
<p class="text-center text-gray-500">No documents uploaded yet.</p>
        <hr class="my-6">

        <h2 class="text-xl font-semibold mb-4">Uploaded PDFs</h2>

        <div class="space-y-8">
            @foreach ($documents as $doc)
                <div class="bg-gray-50 p-4 rounded-lg shadow">
                    <p class="mb-2 text-sm text-gray-600">
                        <span class="font-semibold">Document ID:</span> {{ $doc->id }} |
                        <span class="font-semibold">Type:</span> {{ $doc->type }}
                    </p>
                    <div class="overflow-hidden border rounded-lg">
                        <iframe 
                            src="{{ route('document.view', $doc->id) }}" 
                            class="w-full h-[70vh] border-0 rounded-md"
                        ></iframe>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
