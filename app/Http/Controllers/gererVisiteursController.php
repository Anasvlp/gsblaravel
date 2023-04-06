<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;
use MyDate;
use App\Post;
use PDF;
class gererVisiteursController extends Controller
{
    function lister()
    {
        $les_visiteurs=PdoGsb::getInfosVisiteurs();
        $view= view('listerVisiteurs')->with('les_visiteurs',$les_visiteurs)
                                      ->with('admin',session('admin'));
        return $view;
    }
    
    function ajouterSaisie()
    {
        return view('ajouterVisiteur')->with('admin',session('admin'));

    }

    function ajouterValider(Request $request)
    {
        if (is_numeric($request['cp']))
        {
            $id = PdoGsb::createID();
            $nom = $request['nom'];
            $prenom = $request['prenom'];
            $login = PdoGsb::LoginGeneration($nom,$prenom);
            $mdp = PdoGsb::MdpGeneration(5);
            $adresse = $request['adresse'];       
            $cp = is_numeric($request['cp']);
            $ville = $request['ville'];
            $dateEmbauche = $request['dateEmbauche'];
        
        // affecter $prenom
        PdoGsb::ajouterVisiteur($id, $nom, $prenom, $login, $mdp, $adresse, $cp, $ville, $dateEmbauche);
        $les_visiteurs=PdoGsb::getInfosVisiteurs();
        $view= view('listerVisiteurs')->with('admin',session('admin'))
                                      ->with('les_visiteurs',$les_visiteurs);
        }
        else
        $view= view('ajouterVisiteur')->with('admin',session('admin'));
        return $view;
    }
    function modifierChoix()
    {
        $les_visiteurs=PdoGsb::getInfosVisiteurs();
        $view = view('modifierVisiteurs')->with('admin',session('admin'))
                                        ->with('les_visiteurs',$les_visiteurs);
        return $view;
    }

    function modifierSaisie(Request $request)
    {
        $idVisiteur = $request['id'];

        // $nom = $request['nom'];
        // $prenom = $request['prenom'];
        $les_visiteurs=PdoGsb::getInfosVisiteurs();
        $leVisiteur = PdoGsb::getUnVisiteur($idVisiteur);
        $view = view('modifierVisiteursSaisie')->with('admin',session('admin'))
                                               ->with('leVisiteur',$leVisiteur)
                                               ->with('les_visiteurs',$les_visiteurs);
        return $view;
    }

    function modifierValider(Request $request)
    {
        $id = $request['id'];
        $nom=$request['nom'];
        $prenom=$request['prenom'];
        $adresse=$request['adresse'];
        $cp=$request['cp'];
        $ville=$request['ville'];
        $dateEmbauche=$request['dateEmbauche'];
        
        $modif = PdoGsb::modifierVisiteur($id, $nom, $prenom, $adresse, $cp, $ville, $dateEmbauche);
        $les_visiteurs= PdoGsb::getInfosVisiteurs();
        $message="le membre a bien été modifié";
        $view = view('listerVisiteurs')->with('admin',session('admin'))
                                        ->with('les_visiteurs',$les_visiteurs);
        return $view;
    }

    public function getPostPdf()
{
    $data = json_decode(request('data'), true);
    $pdf = PDF::loadView('pdf.visiteurs', compact('data'));
    return $pdf->download('visiteurs.pdf');
}



}
?>