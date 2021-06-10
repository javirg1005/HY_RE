import { Component, OnInit } from '@angular/core';
import { HttpClient } from "@angular/common/http";
import { FormBuilder, FormGroup } from "@angular/forms";

@Component({
  selector: 'app-ofertas-cp',
  templateUrl: './ofertas-cp.component.html',
  styleUrls: ['./ofertas-cp.component.css']
})
export class OfertasCPComponent implements OnInit {

  title = 'image-gallery';
  public data: any = []
  public lombriz : any = []
  page = 1;
  filtroZForm: FormGroup;
  filtroYForm: FormGroup;
  errors = null

  constructor(
    private http: HttpClient,
    public fb: FormBuilder
    ) {
    this.filtroZForm = this.fb.group({
      precio: [],
      habs: [],
      metros: []
    }) }

  ngOnInit(): void {
    this.getData();
    this.cargarCasa(localStorage.getItem('id_casa'))
  }


  getData() {
    const url = 'http://127.0.0.1:8000/api/inmuebles';
    this.http.get(url).subscribe((res) => {
      this.data = res
      console.log(this.data)
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

  cargarCasa(id) {
    const url1 = 'http://127.0.0.1:8000/api/inmuebles/' + id;
    this.http.get(url1).subscribe((res) => {
      this.lombriz = res
      console.log(this.lombriz)
    });
  }

  onSubmit() {
    const url ='http://127.0.0.1:8000/api/inmuebles-filtro-main/' + this.filtroZForm.value.metros + '/' + this.filtroZForm.value.habs + '/' + this.filtroZForm.value.precio;
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
