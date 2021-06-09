import { Component, OnInit } from '@angular/core';
import { JwtService } from '../../shared/jwt.service';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-signup-form',
  templateUrl: './signup-form.component.html',
  styleUrls: ['./signup-form.component.css']
})
export class SignupFormComponent implements OnInit {

  signupForm: FormGroup;
  errors = null;


  constructor(
      public fb: FormBuilder,
      public router: Router,
      public jwtService: JwtService
    ) {
      this.signupForm = this.fb.group({
        name: [''],
        username: [''],
        email: [''],
        password: ['']
      })
    }
  

  ngOnInit() {}

  onSubmit() {
    this.jwtService.signup(this.signupForm.value).subscribe(
      res => {
        console.log(res)
      },
      error => {
        this.errors = error.error;
      },
      () => {
        this.signupForm.reset()
        this.router.navigate(['LoginForm']);
      }
    )
  }
}