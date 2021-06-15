import { Component, OnInit } from '@angular/core';
import { HttpClient } from "@angular/common/http";
import { FormBuilder, FormGroup } from "@angular/forms";
import { FiltroMain } from '../mainpage/mainpage.component';


@Component({
  selector: 'app-checkpoint',
  templateUrl: './checkpoint.component.html',
  styleUrls: ['./checkpoint.component.css']
})
export class CheckpointComponent implements OnInit {

  title = 'image-gallery';
  public data: any = []
  page = 1;
  filtroVForm: FormGroup;
  errors = null
  max_precio: any = [];
  max_hab: any = [];
  max_met: any = [];


  constructor(
    private http: HttpClient,
    public fb: FormBuilder
    ) {
    this.filtroVForm = this.fb.group({
      precio: [],
      habs: [],
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
    });
    const url_precio = 'http://127.0.0.1:8000/api/inmuebles-max-precio';
    const url_hab = 'http://127.0.0.1:8000/api/inmuebles-max-habitaciones';
    const url_met = 'http://127.0.0.1:8000/api/inmuebles-max-metros';
    this.http.get(url_precio).subscribe((res) => {
      this.max_precio = res
      console.log(this.max_precio);
    })
    this.http.get(url_hab).subscribe((res) => {
      this.max_hab = res
      console.log(this.max_hab);
    })
    this.http.get(url_met).subscribe((res) => {
      this.max_met = res
      console.log(this.max_met);
    })
  }

  searchCoso(provincia, habs, precio) {
    const url ='http://127.0.0.1:8000/api/inmuebles-filtro-main/' + provincia + '/' + habs + '/' + precio;
    console.log(url);
    this.http.get(url).subscribe((res) =>{
      this.data = res
      console.log(this.data)
    })
    
  }

  getIDComponent(casa){
    localStorage.setItem('id_casa', casa.getAttribute('data-casa-id'));
  }

  onSubmit() {
    const url ='http://127.0.0.1:8000/api/filtro-oferta/' + this.filtroVForm.value.metros + '/' + this.filtroVForm.value.habs + '/' + this.filtroVForm.value.precio;
    console.log(url);
    this.http.get(url).subscribe((res) => {
        this.data = res
        console.log(this.data)
      },
      error => {
        this.errors = error.error;
      }
    )
  }

}

export class FiltroInmueble {
  precio: number;
  habs: number;
  metros: number;
}