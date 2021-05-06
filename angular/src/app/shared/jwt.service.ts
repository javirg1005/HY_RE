import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export class User {
  name: String;
  username: String;
  email: String;
  password: String;
}

@Injectable({
  providedIn: 'root'
})

export class JwtService {

  constructor(private http:HttpClient) { }

  signup(user: User): Observable<any> {
    
    var coso = this.http.post('http://127.0.0.1:8000/api/auth/register', user);
    console.log(coso);
    return coso;
  }

  login(user: User): Observable<any> {
    return this.http.post('http://127.0.0.1:8000/api/auth/login', user)
  }
}
