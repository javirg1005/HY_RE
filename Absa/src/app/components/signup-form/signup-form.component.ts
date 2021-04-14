import { Component, OnInit } from '@angular/core';
import { UsersService } from "../../users/users.service";

@Component({
  selector: 'app-signup-form',
  templateUrl: './signup-form.component.html',
  styleUrls: ['./signup-form.component.css']
})
export class SignupFormComponent implements OnInit {
  
  name: string;
  email: string;
  password: string;
  username: string;
  vemail: string;
  vpassword: string;
  
  constructor(public userService: UsersService) { }

  ngOnInit(): void {
  }

  register(){
    const user = { name: this.name, email: this.email, password: this.password, username: this.username, vemail: this.vemail, vpassword: this.vpassword };
    this.userService.register(user).subscribe(data => {
      console.log(data);
    });
  }

}