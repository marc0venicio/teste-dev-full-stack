import { defineStore } from 'pinia'
// Interface
import type { ErrorState } from '@/interfaces'

export const useErrorsStore = defineStore({
  id: 'errors',
  state: (): ErrorState => ({
    message: null,
    category: null,
    fields: { input: {} }
  })
})
