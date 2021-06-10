import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { TokenAuthService } from './shared/token-auth.service';
import { AuthenticationStateService } from './shared/authentication-state.service';
import { HttpClient } from "@angular/common/http";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Absa';

  isLoggedin: boolean;
  public data: any;
  id: String;
  name: String;
  username: String;
  email: String;
  errors = null

  constructor(
    public router: Router,
    private tokenAuthService: TokenAuthService,
    public authenticationStateService: AuthenticationStateService,
    private http: HttpClient
  ) {
  }

  ngOnInit() {
    this.authenticationStateService.userAuthState.subscribe(res => {
      this.isLoggedin = res;
      if (res == true) {
        this.getId();
        this.getName();
      }
  });
  }

  setFullFilter() {
    localStorage.setItem('parche', '0');
  }

  logOut() {
    this.authenticationStateService.setAuthState(false);
    this.tokenAuthService.destroyToken();
    this.tokenAuthService.destroyUsername();
    this.tokenAuthService.destroyIdUsu();
    this.router.navigate(['']);
  }  

  getName() {
    const url_id = 'http://127.0.0.1:8000/api/get-user-id/' + localStorage.getItem('username');
    this.http.get(url_id,{responseType: 'text'}).subscribe((res) => {
      this.id = res
      console.log(this.id)
    });
    const url_name = 'http://127.0.0.1:8000/api/get-user-name/' + localStorage.getItem('username');
    this.http.get(url_name,{responseType: 'text'}).subscribe((res) => {
      this.name = res
      console.log(this.name)
    });
    const url_username = 'http://127.0.0.1:8000/api/get-user-username/' + localStorage.getItem('username');
    this.http.get(url_username,{responseType: 'text'}).subscribe((res) => {
      this.username = res
      console.log(this.username)
    });
    const url_email = 'http://127.0.0.1:8000/api/get-user-email/' + localStorage.getItem('username');
    this.http.get(url_email,{responseType: 'text'}).subscribe((res) => {
      this.email = res
      console.log(this.email)
    });
  }

  getId() {
    const url = 'http://127.0.0.1:8000/api/userId_toUsername/' + localStorage.getItem('username');
    this.http.get(url,{responseType: 'text'}).subscribe((res) => {
      this.data = res
      localStorage.setItem('id_usu', this.data);
    })
  }

}
