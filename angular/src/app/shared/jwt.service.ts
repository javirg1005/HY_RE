import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export class User {
  name: String;
  username: String;
  email: String;
  vemail: String;
  password: String;
  vpassword: String;
}

@Injectable({
  providedIn: 'root'
})

export class JwtService {

  constructor(private http:HttpClient) { }

  signup(user: User): Observable<any> {
    return this.http.post('http://127.0.0.1:8000/api/auth/register', user)
  }

  login(user: User): Observable<any> {
    return this.http.post('http://127.0.0.1:8000/api/auth/login', user)
  }
}
