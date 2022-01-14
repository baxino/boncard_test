<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use Illuminate\Http\Request;
Use Exception;

class CardsController extends Controller
{
    /*
     * Display a listing of cards
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards=Cards::paginate(10)->fragment('cards');
        
        return view('cards.lista_kart',['cards' =>$cards]);
    }
    
    
    /*
     * Show the form of creating a new card
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('cards.create');
    }       
    
    
    /*
     * Store a newly created card in db
     * 
     * 
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'numerKarty' =>'required|unique:Cards|digits:5',
            'pin'=>'required|max:4',
            'dataWaznosci'=>'required',
            'kwota' =>'required'
        ],[],[
            'numerKarty' =>'numer karty',
            'dataWaznosci'=>'data waznosci',
            'pin' =>'PIN'
        ]);
        
        
        $formData=$request->input();
         $kwota_tmp=$request->input('kwota');

        $kwota=str_replace(",",'',$kwota_tmp);
        
        try
        {
            $cards=new Cards();
            
            $cards->numerKarty=$formData['numerKarty'];
            $cards->PIN=$formData['pin'];
            $cards->dataWaznosci=$formData['dataWaznosci'];
            $cards->kwota=$kwota;
            
            $cards->save();
            
            return redirect()->route('cards.create')->with('status',"Dodano kartę.");
            
            
        } catch (Exception $ex) {
         //  dd($ex);
            if ($ex->errorInfo[0]==="22003")
            {
                return redirect()->route('cards.create')->with('failed',"za duża liczba kwoty.");
            }
            return redirect()->route('cards.create')->with('failed',"uppp coś poszlo nie tak");
        }
        
        
    }
    
//    /*
//     * Show a detail of Card
//     * 
//     */
//    public function show (Card $card)
//    {
//        
//    }
    
    
    
    
    /*
     * Show a form for editing a single card
     * 
     */
    public function edit(Cards $card)
    {
        return view('cards.edit',compact('card'));
    }
    
    
    /*
     * Show a detail of Card
     * 
     */
    public function update (Request $request,Cards $card)
    {
        
        $formData=$request->all();
         $kwota_tmp=$formData['kwota'];
         
        $kwota=str_replace(",",'',$kwota_tmp);
        
       
        
        $validated=$request->validate([
            'numerKarty' =>'required|digits:5',
            'pin'=>'required|max:4',
            'dataWaznosci'=>'required',
            'kwota' =>'required'
        ],[],[
            'numerKarty' =>'numer karty',
            'dataWaznosci'=>'data waznosci',
            'pin' =>'PIN'
        ]);
        
       
        $card->numerKarty=$formData['numerKarty'];
            $card->PIN=$formData['pin'];
            $card->dataWaznosci=$formData['dataWaznosci'];
            $card->kwota=$kwota;
            try
            {
                $card->update();
                
             } catch (Exception $ex) {
        
            if ($ex->errorInfo[0]==="22003")
            {
                return redirect()->route('cards.create')->with('failed',"za duża liczba kwoty.");
            }
            return redirect()->route('cards.create')->with('failed',"uppp coś poszlo nie tak");
        }
        
        return redirect()->route('cards.index')->with('success_edit','Karta zaktualizowana.');
    }
    
    
    
    /*
     * Remove card from db
     * 
     * @param \App\Models\Cards
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cards $card)
    {
        $card->delete();
        return redirect()->route('cards.index')->with('success_delete','Wpis został usunięty');
    }
    
    
    
   
    
    
    
}
