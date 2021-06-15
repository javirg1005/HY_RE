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
  public data = '';
  public username = '';
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
        this.getUsername();
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
    const url = 'http://127.0.0.1:8000/api/userId_toName/' + localStorage.getItem('username');
    this.http.get(url,{responseType: 'text'}).subscribe((res) => {
      this.data = res
      console.log(this.data);
    })
  }

  getUsername() {
    this.username = localStorage.getItem('username')
    console.log(this.username);
  }

  getId() {
    const url = 'http://127.0.0.1:8000/api/userId_toUsername/' + localStorage.getItem('username');
    this.http.get(url,{responseType: 'text'}).subscribe((res) => {
      this.data = res
      localStorage.setItem('id_usu', this.data);
    })
  }

}