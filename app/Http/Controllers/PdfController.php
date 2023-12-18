<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Devis;
use App\Models\Facture;
use App\Models\Client;
use App\Models\Entreprise;
use App\Models\DetailsFacture;
use App\Models\DetailsDevis;
use Illuminate\Support\Facades\Response;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class PdfController extends Controller
{
    public function generateDev(Request $request, $DevisId)
    {
        // Retrieve Facture data from the database
        $DevisData = Devis::find($DevisId);
        $ClientData = Client::find($DevisData->client_id);
        $default = 1;
        $EntrepriseData = Entreprise::where('default', $default)->first();

        if (!$DevisData) {
            // Facture not found
            return response()->json(['error' => 'devis not found'], 404);
        }

        // Render the view to HTML
        $html = View::make('pdf.devis', compact('DevisData','EntrepriseData','ClientData'))->render();

        // Generate PDF using Snappy
        $pdf = PDF::loadHtml($html);
        $pdf->setOption('margin-bottom', 0); // Adjust margin as needed
        $pdf->setPaper('A4');
        
         // Output the PDF
        return $pdf->stream('Devis.pdf');
    }
    public function DownloadDev(Request $request, $DevisId)
    {
         // Retrieve Facture data from the database
        $DevisData = Devis::find($DevisId);
        $ClientData = Client::find($DevisData->client_id);
        $default = 1;
        $EntrepriseData = Entreprise::where('default', $default)->first();

        if (!$DevisData) {
            // Facture not found
            return response()->json(['error' => 'devis not found'], 404);
        }

        // Render the view to HTML
        $html = View::make('pdf.devis', compact('DevisData','EntrepriseData','ClientData'))->render();

        // Generate PDF using Snappy
        $pdf = PDF::loadHtml($html);
        $pdf->setOption('margin-bottom', 0); // Adjust margin as needed
        $pdf->setPaper('A4');
        
        // Set the appropriate headers for the response
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename=Devis.pdf',
        ];

        // Return the PDF as a response
        return response($pdf->output(), 200, $headers);
    }
        public function generateFac(Request $request, $FactureId)
    {
        // Retrieve Facture data from the database
        $FactureData = Facture::find($FactureId);
        $ClientData = Client::find($FactureData->client_id);
        $default = 1;
        $EntrepriseData = Entreprise::where('default', $default)->first();

        if (!$FactureData) {
            // Facture not found
            return response()->json(['error' => 'Facture not found'], 404);
        }

        // Render the view to HTML
        $html = View::make('pdf.facture', compact('FactureData','EntrepriseData','ClientData'))->render();

        // Generate PDF using Snappy
        $pdf = PDF::loadHtml($html);
        $pdf->setOption('margin-bottom', 0); // Adjust margin as needed
        $pdf->setPaper('A4');
        
         // Output the PDF
        return $pdf->stream('Facture.pdf');
    }
    public function DownloadFac(Request $request, $FactureId)
    {
        // Retrieve Facture data from the database
        $FactureData = Facture::find($FactureId);
        $ClientData = Client::find($FactureData->client_id);
        $default = 1;
        $EntrepriseData = Entreprise::where('default', $default)->first();
        if (!$FactureData) {
            // Facture not found
            return response()->json(['error' => 'Facture not found'], 404);
        }

        // Render the view to HTML
        $html = View::make('pdf.facture', compact('FactureData','EntrepriseData','ClientData'))->render();

        // Generate PDF using Snappy
        $pdf = PDF::loadHtml($html);
        $pdf->setOption('margin-bottom', 0); // Adjust margin as needed
        $pdf->setPaper('A4');
        
        // Set the appropriate headers for the response
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename=Facture.pdf',
        ];

        // Return the PDF as a response
        return response($pdf->output(), 200, $headers);
    }
}