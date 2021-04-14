import { Component, OnInit } from '@angular/core';
/*import { UsersService } from "../../users/users.service";*/

@Component({
  selector: 'app-login-form',
  templateUrl: './login-form.component.html',
  styleUrls: ['./login-form.component.css']
})
export class LoginFormComponent implements OnInit {

  usuario: string;
  password: string;

  ngOnInit(): void {
  }
  constructor() {}
  /*
  constructor(public userService: UsersService) { }

  

  login(){
    const user = {usuario: this.usuario, password: this.password};
    this.userService.login(user).subscribe( data => {
      console.log(data);
    });
  }*/
}
