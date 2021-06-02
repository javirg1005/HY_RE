import { Component, OnInit } from '@angular/core';
import { HttpClient } from "@angular/common/http";
import { FormBuilder, FormGroup } from "@angular/forms";


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

  constructor(
    private http: HttpClient,
    public fb: FormBuilder,
    ) {
    this.filtroVForm = this.fb.group({
      precio: [],
      habitaciones: [],
      metros: []
    }) }

  ngOnInit(): void {
    this.getData();
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

  getIDComponent(casa){
    localStorage.setItem('id_casa', casa.getAttribute('data-casa-id'));
  }

  onSubmit() {
    
  }

}
