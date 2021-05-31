import { Component, OnInit } from '@angular/core';
import { HttpClient } from "@angular/common/http";

@Component({
  selector: 'app-info',
  templateUrl: './info.component.html',
  styleUrls: ['./info.component.css']
})
export class InfoComponent implements OnInit {

  public data: any = [];

  constructor(private http: HttpClient) { }

  ngOnInit(): void {
    this.getData();
  }

  getData() {
    const url = 'http://127.0.0.1:8000/api/inmuebles/' + localStorage.getItem('id_casa');
    this.http.get(url).subscribe((res) => {
      this.data = res
      console.log(this.data)
    })
  }

}
