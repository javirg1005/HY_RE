import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { TokenAuthService } from '../../shared/token-auth.service';
import { AuthenticationStateService } from '../../shared/authentication-state.service';
import { FormBuilder, FormGroup } from "@angular/forms";
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-mainpage',
  templateUrl: './mainpage.component.html',
  styleUrls: ['./mainpage.component.css']
})

export class MainpageComponent implements OnInit {

  searchForm: FormGroup;
  max_precio: any = [];
  max_hab: any = [];
  max_met: any = [];
  errors = null;

  constructor(
    public fb: FormBuilder,
    public router: Router,
    private http:HttpClient
  ) {
    this.searchForm = this.fb.group({
      username: [],
      password: []
    }) 
  }

  ngOnInit() {
    this.getData();
  }

  onSubmit() {
    this.searchCoso(this.searchForm.value).subscribe(
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

  valuePrice() {
    var slider =<HTMLInputElement> document.getElementById('priceRange');
    var val = document.getElementById('priceTag');
    val.innerHTML = slider.value;
  }

  valueHab() {
    var slider =<HTMLInputElement> document.getElementById('habRange');
    var val = document.getElementById('habTag');
    val.innerHTML = slider.value;
  }

  getData() {
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

  searchCoso(fb: FiltroMain): Observable<any> {
    console.log(fb.poblacion)
    console.log(fb.precio)
    console.log(fb.provincia)
    return this.http.post('http://127.0.0.1:8000/api/filtro-main', fb);
  }


}

export class FiltroMain {
  precio: number;
  poblacion: number;
  provincia: String;
}
