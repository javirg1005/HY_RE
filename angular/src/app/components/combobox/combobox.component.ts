import { Component, OnInit, Input } from '@angular/core';
@Component({
selector: 'app-combo-box',
templateUrl: './combobox.component.html',
styleUrls: ['./combobox.component.css']
})
export class ComboboxComponent implements OnInit {
    @Input() list: string[] = ["Todas las provincias", "Albacete", "Alicante", "Almería", "Álava", "Asturias", "Ávila", "Badajoz", "Baleares (Islas)", 
    "Barcelona", "Vizcaya", "Burgos", "Cáceres", "Cádiz", "Cantabria", "Castellón", "Ceuta", "Ciudad Real", "Córdoba", "A Coruña",
    "Cuenca", "Gipuzkoa", "Girona", "Granada", "Guadalajara", "Huelva", "Huesca", "Jaén", "León", "Lleida", "Lugo", "Madrid", "Málaga",
    "Melilla", "Murcia", "Navarra", "Ourense", "Palencia", "Las Palmas", "Pontevedra", "La Rioja", "Salamanca", "Santa Cruz de Tenerife", 
    "Segovia", "Sevilla", "Soria", "Tarragona", "Teruel", "Toledo", "Valencia", "Valladolid", "Zamora", "Zaragoza"];
    // two way binding for input text
    inputItem = '';
    // enable or disable visiblility of dropdown
    listHidden = true;
    showError = false;
    selectedIndex = -1;
    // the list to be shown after filtering
    filteredList: string[] = [];
    constructor() { }
    ngOnInit() {
        this.filteredList = this.list;
        this.inputItem = this.filteredList[0];
    }
    // modifies the filtered list as per input
    getFilteredList() {
        this.listHidden = false;
        if (!this.listHidden && this.inputItem !== undefined) {
            this.filteredList = this.list.filter((item) =>  item.toLowerCase().startsWith(this.inputItem.toLowerCase()));
    }
}
    // select highlighted item when enter is pressed or any item that is clicked
    selectItem(ind) {
        this.inputItem = this.filteredList[ind];
        this.listHidden = true;
        this.selectedIndex = ind;
        localStorage.setItem('provincia', this.inputItem);
    }
    // navigate through the list of items
    onKeyPress(event) {
        if (!this.listHidden) {
            if (event.key === 'Escape') {
                this.selectedIndex = -1;
                this.toggleListDisplay(0);
            }else if (event.key === 'Enter') {
                this.toggleListDisplay(0);
            }else if (event.key === 'ArrowDown') {
                this.listHidden = false;
                this.selectedIndex = (this.selectedIndex + 1) % this.filteredList.length;
                if (this.filteredList.length > 0 && !this.listHidden) {
                    document.getElementsByTagName('list-item')[this.selectedIndex].scrollIntoView();
                }
            } else if (event.key === 'ArrowUp') {
                this.listHidden = false;
                if (this.selectedIndex <= 0) {
                    this.selectedIndex = this.filteredList.length;
                }
                this.selectedIndex = (this.selectedIndex - 1) % this.filteredList.length;
                if (this.filteredList.length > 0 && !this.listHidden) {
                document.getElementsByTagName('list-item')[this.selectedIndex].scrollIntoView();
                }
            }
        }
    }
    // show or hide the dropdown list when input is focused or moves out of focus
    toggleListDisplay(sender: number) {
        if (sender === 1) {
            this.listHidden = false;
            this.getFilteredList();
        } else {
            // helps to select item by clicking
            setTimeout(() => {
                this.selectItem(this.selectedIndex);
                this.listHidden = true;
                if (!this.list.includes(this.inputItem)) {
                    this.showError = true;
                    this.filteredList = this.list;
                } else {
                    this.showError = false;
                }
            }, 500);
        }
    }
}