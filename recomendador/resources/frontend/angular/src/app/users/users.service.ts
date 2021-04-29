// src/app/users/users.service.ts

import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
/*import { Observable } from "rxjs/Observable";*/
//import { CookieService } from "ngx-cookie-service";

@Injectable({
    providedIn: "root"
})
export class UsersService {
    httpClient: any; /* A ver si funciona */ 
    constructor(private http: HttpClient/*, private cookies: CookieService*/) {}

    /*login(user: Any): Observable<any> {
        return this.http.post("RUTA API KAWAII", user);
    }*/

    login(datos){
        return this.httpClient.post('http://127.0.0.1:8000/api/login',datos);
      }

    /*register(user: Any): Observable<any> {
        return this.http.post("RUTA API KAWAII", user);
    }
    setToken(token: String) {
        this.cookies.set("token", token);
    }
    getToken() {
        return this.cookies.get("token");
    }*/
} 