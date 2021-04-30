import { Component, OnInit } from '@angular/core';
import { UsersService } from "../../users/users.service";
import { HttpClient } from "@angular/common/http";

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
  
  constructor(private httpClient:HttpClient, userService: UsersService) { }
  

  login(datos){
    return this.httpClient.post('http://127.0.0.1:8000/api/users', datos);
  }
}
