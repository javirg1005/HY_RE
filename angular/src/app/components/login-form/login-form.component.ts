import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormBuilder, FormGroup } from "@angular/forms";

import { JwtService } from './../../shared/jwt.service';
import { TokenAuthService } from '../../shared/token-auth.service';
import { AuthenticationStateService } from '../../shared/authentication-state.service';

@Component({
  selector: 'app-login-form',
  templateUrl: './login-form.component.html',
  styleUrls: ['./login-form.component.css']
})
export class LoginFormComponent implements OnInit {

  loginForm: FormGroup;
  errors = null;


  ngOnInit(): void {
  }
  
  constructor( public router: Router,
    public fb: FormBuilder,
    public jwtService: JwtService,
    private tokenAuthService: TokenAuthService,
    private authenticationStateService: AuthenticationStateService,
  ) {
    this.loginForm = this.fb.group({
      username: [],
      password: []
    }) }
  

    onSubmit() {
      this.jwtService.login(this.loginForm.value).subscribe(
        res => {
          this.tokenStorage(res);
        },
        error => {
          this.errors = error.error;
        },() => {
          this.authenticationStateService.setAuthState(true);
          this.loginForm.reset()
          this.router.navigate(['']);
        }
      );
  }

  tokenStorage(jwt){
    this.tokenAuthService.setTokenStorage(jwt.access_token);
  }
}
