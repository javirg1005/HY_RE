import { Component, OnInit } from '@angular/core';
import { HttpClient } from "@angular/common/http";
import { FormBuilder, FormGroup } from "@angular/forms";
import { FiltroMain } from '../mainpage/mainpage.component';


@Component({
  selector: 'app-ofertas',
  templateUrl: './ofertas.component.html',
  styleUrls: ['./ofertas.component.css']
})
export class OfertasComponent implements OnInit {

  title = 'image-gallery';
  public data: any = []
  page = 1;
  filtroVForm: FormGroup;
  errors = null

  constructor(
    private http: HttpClient,
    public fb: FormBuilder
    ) {
    this.filtroVForm = this.fb.group({
      precio: [],
      habitaciones: [],
      metros: []
    }) }

  ngOnInit(): void {
    if(localStorage.getItem('parche') == '1'){
      this.searchCoso(localStorage.getItem('provincia'), localStorage.getItem('habs'), localStorage.getItem('precio'))
    }else{
      this.getData();
    }
  }

  handlePageChange(event) {
    this.page = event;
  }
   
  getData() {
    const url = 'http://127.0.0.1:8000/api/inmuebles';
    this.http.get(url).subscribe((res) => {
      this.data = res
      console.log(this.data)
    })
  }

  searchCoso(provincia, habs, precio) {
   

    const url ='http://127.0.0.1:8000/api/inmuebles-filtro-main/' + {"precio": precio, "habs": habs, "provincia": provincia};
    this.http.get(url).subscribe((res) =>{
      this.data = res
      console.log(this.data)
    })
    
  }

  getIDComponent(casa){
    localStorage.setItem('id_casa', casa.getAttribute('data-casa-id'));
  }

  onSubmit() {
    this.aplicarFiltro(this.filtroVForm.value).subscribe(
      res => {
        console.log(res)
        //Encuentra ha funcionado el filtro
      },
      error => {
        this.errors = error.error;
        //Da error
      }
    )
  }

  aplicarFiltro(fb: FiltroInmueble) {
    console.log(fb.precio)
    console.log(fb.habitaciones)
    console.log(fb.metros)

    return this.http.post('http://127.0.0.1:8000/api/filtro-oferta', fb);
  }

}

export class FiltroInmueble {
  precio: number;
  habitaciones: number;
  metros: number;
}