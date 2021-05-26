import { Component, OnInit } from '@angular/core';
import { HttpClient } from "@angular/common/http";

@Component({
  selector: 'app-ofertas',
  templateUrl: './ofertas.component.html',
  styleUrls: ['./ofertas.component.css']
})
export class OfertasComponent implements OnInit {

  title = 'image-gallery';
  private data:any = []

  constructor() { 
    private http: HttpClient;
  }

  ngOnInit(): void {
    const url = 'http://127.0.0.1:8000/api/inmuebles';
    this.http.get(url).subscribe((res) => {
      this.data = res
      console.log(this.data)
  }

}
