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

  searchCoso(fb: FiltroMain): Observable<any> {
    return this.http.post('http://127.0.0.1:8000/api/filtro-main', fb);
  }


}

export class FiltroMain {
  precio: number;
  poblacion: number;
  provincia: String;
}
