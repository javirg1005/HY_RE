import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { TokenAuthService } from '../../shared/token-auth.service';
import { AuthenticationStateService } from '../../shared/authentication-state.service';

@Component({
  selector: 'app-mainpage',
  templateUrl: './mainpage.component.html',
  styleUrls: ['./mainpage.component.css']
})
export class MainpageComponent implements OnInit {

  isLoggedin: boolean;

  constructor(
    public router: Router,
    private tokenAuthService: TokenAuthService,
    public authenticationStateService: AuthenticationStateService
  ) {
  }

  ngOnInit() {
    this.authenticationStateService.userAuthState.subscribe(res => {
      this.isLoggedin = res;
  });
  }

  logOut() {
    this.authenticationStateService.setAuthState(false);
    this.tokenAuthService.destroyToken();
    this.router.navigate(['LoginForm']);
  }  

}
