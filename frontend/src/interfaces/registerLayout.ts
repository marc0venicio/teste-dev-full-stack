import DashboardLayout from '@/layouts/DashboardLayout.vue'
import DefaultLayout from '@/layouts/DefaultLayout.vue'

export interface Layouts {
  [key: string]: typeof DashboardLayout | typeof DefaultLayout
}