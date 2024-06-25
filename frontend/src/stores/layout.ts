import { defineStore } from 'pinia'
// Interface
import type { Routes } from '@/interfaces'

export const useLayoutStore = defineStore('layout', () => {
  const imageProfile: string = 'mdi-account-circle'
  const drawer: boolean = true
  const rail: boolean = true
  const routes: Array<Routes> = [
    {
      name: 'Inicio',
      icon: 'mdi-home-account',
      route: '/'
    },
    {
      name: 'Usuarios',
      icon: 'mdi-account-group',
      route: '/users'
    }
  ]
  return { drawer, rail, routes, imageProfile }
})
